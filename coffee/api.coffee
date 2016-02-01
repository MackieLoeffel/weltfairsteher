entityMap =
  '&': '&amp;'
  '<': '&lt;'
  '>': '&gt;'
  '"': '&quot;'
  '\'': '&#39;'
  '/': '&#x2F;'

escapeHtml = (string) -> String(string).replace /[&<>"'\/]/g, (s) -> entityMap[s]

appendResult = (dest, errors) ->
  resultDiv = $("##{dest} > .result")
  if !resultDiv.length
    resultDiv = $("<div class='result'></div>")
    resultDiv.appendTo("##{dest}")
  resultDiv.empty()
  if errors.length
    list = $("<ul></ul>")
    for error in errors
      list.append("<li>#{escapeHtml(error)}</li>")
    resultDiv.append(list)
  else
    resultDiv.append("<b>Erfolgreich!</b>")
    setTimeout (-> resultDiv.hide() ), 3000
  resultDiv.show()
  return

window.callApi = (api, data, cb) ->
  request =
    url: "api/#{api}.php"
    data: data
    success: (errors) ->
      console.log errors
      errors = JSON.parse(errors)
      cb? errors
  if data instanceof FormData
    request.contentType = false
    request.processData = false
  $.post request
  return false

window.sendForm = (form, {api, cb, data} = {}) ->
  dest = $(form).attr("id")
  window.callApi (api ? dest), (data ? $("##{dest}").serialize()), (errors) ->
    cb? errors
    appendResult(dest, errors)
  return false

# see http://stackoverflow.com/a/9622978
window.sendFile = (dest) ->
  fd = new FormData()
  errors = []
  for file in $("##{dest} > :input")
    # .files doesn't work with the jquery object
    files = file.files
    file = $(file)
    if file.attr("type") == "file"
      if !files[0]?
        errors.push "Keine Datei ausgewählt"
      else
        fd.append file.attr("name"), files[0]
    else
      continue if file.attr("type") == "radio" && !file.is(":checked")
      fd.append file.attr("name"), file.val()

  if errors.length
    appendResult dest, errors
    return

  window.callApi dest, fd, (errors) ->
    appendResult dest, errors
  return false

window.downloadPDF = (challenge, type) ->
  form = $("#downloadForm")
  if !form.length
    form = $ """
      <form id='downloadForm' style='display:none' method='POST' action='api/download.php'>
        <input type="hidden" name="challenge" value="#{challenge}"></input>
        <input type="hidden" name="type" value="#{type}"></input>
      </form>"""
    form.appendTo "body"
  form.find("[name='challenge']")[0].value = challenge
  form.find("[name='type']")[0].value = type
  form.submit()

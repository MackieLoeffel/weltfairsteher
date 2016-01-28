entityMap =
  '&': '&amp;'
  '<': '&lt;'
  '>': '&gt;'
  '"': '&quot;'
  '\'': '&#39;'
  '/': '&#x2F;'

escapeHtml = (string) -> String(string).replace /[&<>"'\/]/g, (s) -> entityMap[s]

window.sendForm = (form) ->
  dest = $(form).attr("id")
  $.post("admin/#{dest}.php", $("##{dest}").serialize()).done (errors) ->
    console.log errors
    errors = JSON.parse(errors)
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


  return false

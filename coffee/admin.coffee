
window.acceptSelfmade = ->
  sendForm "#acceptSelfmade", api: "addChallenge", cb: (errors) ->
    # there is a race condition between adding and deleting here, but we don't care
    return if errors.length
    callApi "deleteChallenge", suggested: "1", challenge: $("#selfmadeSelect").val()

selectSelfmade = ->
  id = $("#selfmadeSelect").val()
  console.log "selected:", id
  for prop in ["title", "points", "class", "description"]
    $("#acceptSelfmade >> [name='#{prop}']").val(suggestedChallenges[id][prop])
  $("#class-name").text suggestedChallenges[id].name
  $("#teacher-email").text suggestedChallenges[id].email

$('document').ready ->
  first = null
  for id of suggestedChallenges
    first = id
    break
  return unless first?
  $("#selfmadeSelect").val first
  $("#selfmadeSelect").change selectSelfmade
  selectSelfmade()

  $(".slide-down .slide-down-header").each  ->
    $(this).click ->
      $(this).siblings(".slide-down-hidden").slideToggle(300)
      $(this).find(".fa").toggleClass("fa-arrow-down")
      $(this).find(".fa").toggleClass("fa-arrow-up")
  return

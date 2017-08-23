window.flower_values = {}

window.rateChallenge = (id, rating) ->
  callApi 'rateChallenge',
    {'challenge': id, 'rating': rating},
    (errors, errcode) ->
      if errcode == 401
        alert('Bewerten von Challenges ist nur für eingeloggte Lehrer erlaubt.')
        return

      alert('Die Challenge wurde mit ' + rating + ' Blumen bewertet.')
      flower_values[id].count += 1
      flower_values[id].sum += rating
      updateFlowerDisplay(id)

$('document').ready ->
  for key of flower_values
    updateFlowerDisplay(key)

updateFlowerDisplay = (id) ->
  flowers = 0
  flowers = flower_values[id].sum / flower_values[id].count if flower_values[id].count > 0
  for i in [0..5]
    if flowers < i + 0.25
      flower_image = "sonnenblume-bewertung-grau.png"
    else if flowers < i + 0.75
      flower_image = "sonnenblume-bewertung-halb.png"
    else
      flower_image = "sonnenblume-bewertung.png"

    $("#sonnenblume-" + id + "-" + i).attr("src", flower_image)

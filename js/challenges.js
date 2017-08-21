// Generated by CoffeeScript 1.10.0
(function() {
  var updateFlowerDisplay;

  window.flower_values = {};

  window.rateChallenge = function(id, rating) {
    callApi('rateChallenge', {
      'challenge': id,
      'rating': rating
    });
    alert('Die Challenge wurde mit ' + rating + ' Blumen bewertet.');
    flower_values[id].count += 1;
    flower_values[id].sum += rating;
    return updateFlowerDisplay(id);
  };

  $('document').ready(function() {
    var key, results;
    results = [];
    for (key in flower_values) {
      results.push(updateFlowerDisplay(key));
    }
    return results;
  });

  updateFlowerDisplay = function(id) {
    var flower_image, flowers, i, j, results;
    flowers = 0;
    if (flower_values[id].count > 0) {
      flowers = flower_values[id].sum / flower_values[id].count;
    }
    results = [];
    for (i = j = 0; j <= 5; i = ++j) {
      if (flowers < i + 0.25) {
        flower_image = "sonnenblume-bewertung-grau.png";
      } else if (flowers < i + 0.75) {
        flower_image = "sonnenblume-bewertung-halb.png";
      } else {
        flower_image = "sonnenblume-bewertung.png";
      }
      results.push($("#sonnenblume-" + id + "-" + i).attr("src", flower_image));
    }
    return results;
  };

}).call(this);

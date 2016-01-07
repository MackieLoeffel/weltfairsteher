// Generated by CoffeeScript 1.9.1
var init, selectedClass, setClass;

selectedClass = null;

setClass = function(newClass) {
  console.log('setClass:', newClass);
  $('.class-' + selectedClass).removeClass('class-selected');
  selectedClass = newClass;
  localStorage.setItem('selectedClass', selectedClass);
  $('.class-value').val(selectedClass);
  $('.class-' + selectedClass).addClass('class-selected');
  if (typeof chart !== "undefined" && chart !== null) {
    chart.setClass(selectedClass);
  }
};

init = function() {
  var classSelect, classes;
  selectedClass = localStorage.getItem('selectedClass');
  classes = [];
  $('#class-select option').each(function(v, a) {
    return classes.push($(a).prop('value'));
  });
  if ((selectedClass == null) || classes.indexOf(selectedClass) === -1) {
    selectedClass = classes[0];
  }
  classSelect = $('#class-select');
  classSelect.val(selectedClass);
  setClass(selectedClass);
  return classSelect.on('change', function() {
    setClass(this.value);
  });
};

init();

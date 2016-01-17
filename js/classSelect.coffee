selectedClass = null
setClass = (newClass) ->
  console.log 'setClass:', newClass
  $('.class-' + selectedClass).removeClass 'class-selected'
  selectedClass = newClass
  localStorage.setItem 'selectedClass', selectedClass
  $('.class-value').val selectedClass
  $('.class-' + selectedClass).addClass 'class-selected'
  chart?.setClass(selectedClass)
  return

$('document').ready ->
  selectedClass = localStorage.getItem('selectedClass')

  classes = []
  $('#class-select option').each (v, a) -> classes.push $(a).prop('value')

  selectedClass = classes[0] if !selectedClass? or classes.indexOf(selectedClass) == -1

  classSelect = $('#class-select')
  classSelect.val selectedClass
  setClass selectedClass

  classSelect.on 'change', ->
    setClass @value
    return

selectedClass = null
classSelectChanged = []
setClass = (newClass) ->
  console.log 'setClass:', newClass
  $('.class-' + selectedClass).removeClass 'class-selected'
  selectedClass = newClass
  localStorage.setItem 'selectedClass', selectedClass
  $('.class-value').val selectedClass
  $('.class-' + selectedClass).addClass 'class-selected'

  f(selectedClass) for f in classSelectChanged
  return

onClassSelectChanged = (f) ->
  f selectedClass if selectedClass?
  classSelectChanged.push f

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

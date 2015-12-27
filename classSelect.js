var selectedClass;
function setClass(newClass) {
    console.log("setClass:", newClass);

    $(".class-" + selectedClass).removeClass("class-selected");

    selectedClass = newClass;
    localStorage.setItem("selectedClass", selectedClass);

    $(".class-value").val(selectedClass);
    $(".class-" + selectedClass).addClass("class-selected");
    //chart.setClass(selectedClass);

}
selectedClass = localStorage.getItem("selectedClass");
var classes = [];
$("#class-select option").each(function (v, a) {
    classes.push($(a).prop("value"));
});
if(!selectedClass || classes.indexOf(selectedClass) == -1) {
    selectedClass = classes[0];
}
classSelect = $("#class-select");
classSelect.val(selectedClass);
setClass(selectedClass);

classSelect.on("change", function() {
    console.log(this.value);
    setClass(this.value);
});

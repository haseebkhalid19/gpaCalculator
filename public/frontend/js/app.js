function gradePoints(index) {
    const marksObtained = document.getElementById("marksObtained" + index);
    const creditHours = document.getElementById("creditHours" + index);
    const gradePoints = document.getElementById("gradePoints" + index);

    let numericGrade;
    let alphabaticGrade;

    if (marksObtained.value >= 90 && marksObtained.value <= 100) {
      numericGrade = 4;
      alphabaticGrade = "A+";
    } else if (marksObtained.value >= 80 && marksObtained.value <= 89) {
      numericGrade = 4;
      alphabaticGrade = "A";
    } else if (marksObtained.value >= 70 && marksObtained.value <= 79) {
      numericGrade = 3.5;
      alphabaticGrade = "B+";
    } else if (marksObtained.value >= 60 && marksObtained.value <= 69) {
      numericGrade = 3;
      alphabaticGrade = "B";
    } else if (marksObtained.value >= 55 && marksObtained.value <= 59) {
      numericGrade = 2.5;
      alphabaticGrade = "C+";
    } else if (marksObtained.value >= 50 && marksObtained.value <= 54) {
      numericGrade = 2;
      alphabaticGrade = "C";
    } else {
      alphabaticGrade = "F";
    }

    if (numericGrade) {
      gradePoints.value = parseFloat(creditHours.value) * numericGrade;
    } else {
      gradePoints.value = "";
    }
  }

  document.addEventListener("keyup", () => {
    let index = 1;
    while (index) {
        gradePoints(index);
        index++;
    }
});


$(document).ready(function () {
    $("body").on("click", ".add_new_frm_field_btn", function () {
        console.log("clicked");
        var index =
            $(".form_field_outer").find(".form_field_outer_row").length + 1;
        $(".form_field_outer").append(`
                    <div class="row form_field_outer_row append_item py-3">
                        <div class="form-group col-md-2 py-2">
                            <input type="text" class="form-control" id="course${index}" name="course"
                                placeholder="Course Name">
                        </div>
                        <div class="form-group col-md-2 py-2">
                            <input type="number" class="form-control" id="maxMarks${index}" name="maxMarks"
                                placeholder="Max Marks">
                        </div>
                        <div class="form-group col-md-2 py-2">
                            <input type="number" class="form-control" id="marksObtained${index}" name="marksObtained"
                                placeholder="Marks Obtained">
                        </div>
                        <div class="form-group col-md-2 py-2">
                            <input type="number" class="form-control" id="creditHours${index}" placeholder="Credit  Hours" name="creditHours">
                        </div>
                        <div class="form-group col-md-2 py-2">
                            <input type="number" class="form-control" id="gradePoints${index}" placeholder="Grade Points" name="gradePoints">
                        </div>
                        <div class="form-group col-md-2 py-2 add_del_btn_outer">
                        <button type="button" class="btn_round add_new_frm_field_btn" title="Add Row">
                            <i class="fas fa-copy"></i>
                        </button>

                        <button type="button" class="btn_round remove_node_btn_frm_field" disabled>
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
`);

        $(".form_field_outer")
            .find(".remove_node_btn_frm_field:not(:first)")
            .prop("disabled", false);
        $(".form_field_outer")
            .find(".remove_node_btn_frm_field")
            .first()
            .prop("disabled", true);
    });
});

///======Clone method
$(document).ready(function () {
    $("body").on("click", ".add_node_btn_frm_field", function (e) {
        var index =
            $(e.target)
                .closest(".form_field_outer")
                .find(".form_field_outer_row").length + 1;
        var cloned_el = $(e.target)
            .closest(".form_field_outer_row")
            .clone(true);

        $(e.target)
            .closest(".form_field_outer")
            .last()
            .append(cloned_el)
            .find(".remove_node_btn_frm_field:not(:first)")
            .prop("disabled", false);

        $(e.target)
            .closest(".form_field_outer")
            .find(".remove_node_btn_frm_field")
            .first()
            .prop("disabled", true);

        //change id
        // $(e.target).closest(".form_field_outer").find(".form_field_outer_row").last().find("input[type='text']").attr("id", "mobileb_no_" + index);

        // $(e.target).closest(".form_field_outer").find(".form_field_outer_row").last().find("select").attr("id", "no_type_" + index);

        // console.log(cloned_el);
        //count++;
    });
});

$(document).ready(function () {
    //===== delete the form fieed row
    $("body").on("click", ".remove_node_btn_frm_field", function () {
        $(this).closest(".form_field_outer_row").remove();
        console.log("success");
    });
});

$(function () {
    $(document).on("click", ".action_delete", actionDelete);
    // $(document).on('click','.edit-information-order',editOrder);
    $('.js-attribute-select').on('change', updateInformationSpeciesOfAttribute);
});
function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data("url");
    let that = $(this);
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function (data) {
                    console.log(data);
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        );
                    }
                },
                error: function () {},
            });
        }
    });
}
function updateInformationSpeciesOfAttribute(e) {
    var valueSelected = this.value;
    if (valueSelected != 0) {
        /*var optionSelected = $('.js-attribute-select').find(":selected");*/
        var optionSelected = this.options[this.selectedIndex];
        console.log(this.options[0]);

        optionSelected.setAttribute("disabled", "");
        nameSelected = this.options[this.selectedIndex].innerHTML;
        /*alert(valueSelected);*/

        //ajax get data species[] of attribute
        let urlRequest = "http://127.0.0.1:8000/admin/pro/opt/"+valueSelected;
        console.log(urlRequest);
        $.ajax({
            type: "GET",
            url: urlRequest,
            success: function (data, textStatus, xhr) {
                console.log(xhr.status);
                if (xhr.status == 200) {
                    console.log(data);
                    console.log("thanh cong delete");
                    //add element
                    let itemReplace = document.querySelector(".attribute-species");
                    let newItem = document.createElement("div");
                    newItem.classList.add("species");
                    newItem.innerHTML = '<label>Tên:' + nameSelected + '</label><br/><label> Giá trị(s):</label ><div class="select2-purple" ><select name="attribute_values[]" class="js-species-select" multiple="multiple" data-placeholder="Chọn tên chủng loại" data-dropdown-css-class="select2-purple" style="width: 100%;">' + data + '</select></div> ';
                    itemReplace.appendChild(newItem);
                    reload_js('/js/custome-form.js');
                }
            },
            error: function (data) {
                console.log("loi");
            },
        });
    }
}
function reload_js(src) {
    $('script[src="'+src+'"]').remove();
    $('<script>').attr('src', src).appendTo('head');
}
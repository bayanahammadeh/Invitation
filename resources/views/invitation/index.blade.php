@include('layouts.header')

<!-- Add Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">معلومات المدعو</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="nike1">اللقب</label>
                            <select id="nike1" name="nike1" class="nike1 form-control">
                                <option>الرجاء الاختيار</option>
                                <option>معالي</option>
                                <option>سعادة</option>
                                <option>Mr</option>
                                <option>Your Excellency</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="nike2">اللقب 2</label>
                            <select id="nike2" name="nike2" class="nike2 form-control"></select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="name">الاسم الكامل</label>
                            <input type="text" id="name" name="name" class="name form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="email1">البريد الالكتروني</label>
                            <input type="text" id="email1" name="email1" class="email1 form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="email2">بريد الكتروني اضافي</label>
                            <input type="text" id="email2" name="email2" class="email2 form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="organization">الجهة</label>
                            <input type="text" id="organization" name="organization"
                                class="organization form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="mobile">رقم الواتساب</label>
                            <input type="text" id="mobile" name="mobile" class="mobile form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="job">المنصب</label>
                            <input type="text" id="job" name="job" class="job form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="category">الفئة</label>
                            <select id="category" name="category" class="category form-control"></select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="toggle-email">بريد</label>
                            <input type="checkbox" checked="true" data-toggle="toggle" data-onstyle="outline-success"
                                data-on="نعم" data-off="لا" data-offstyle="outline-danger" id="invitation_type_email">
                        </div>
                        <div class="col-md-4">
                            <label for="toggle-mobile">واتساب</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="outline-success" data-on="نعم"
                                data-off="لا" data-offstyle="outline-danger" id="invitation_type_mobile">
                        </div>
                        <div class="col-md-4">
                            <label for="toggle-confirm">تأكيد</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="outline-success" data-on="نعم"
                                data-off="لا" data-offstyle="outline-danger" id="order_status">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="add btn btn-primary">إرسال</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container" style="background-color: #fff">
    <main class="flex-shrink-1">
        <div class="container">
            <div class="row">
                <div class="col-md-1 mb-1" style="float: right">
                    <a href="#" class="btn btn-primary btn-sm float-end" id="add-social"
                        data-bs-toggle="modal" data-bs-target="#AddModal">إضافة</a>
                </div>
            </div>

            <table id="example" class="table table-striped table-bordered" style="text-align: right;">
                <thead>
                    <tr>
                        <th style="text-align: right;">تاريخ الارسال</th>
                        <th style="text-align: right;">الاسم</th>
                        <th style="text-align: right;">رقم الواتس آب</th>
                        <th style="text-align: right;">ايميل</th>
                        <th style="text-align: right;">تأكيد الحضور</th>
                        <th style="text-align: right;">x</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </main>
</div>


@include('layouts.footer')

<script>
    function fetch() {
        resetFields();
        var x, created_at;
        $.ajax({
            type: 'GET',
            url: `/fetch`,
            dataType: 'json',
            success: function(response) {
                $('tbody').html("");
                $.each(response.invitations, function(key, item) {
                    created_at = new Date(item.created_at);
                    if (item.order_status == "2")
                        check =
                        '<input  type="checkbox"  checked></div>';
                    else
                        check =
                        '<input type="checkbox"></div>';
                    $('tbody').append(
                        '<tr>\
                                                                            <td>' +
                        created_at.toLocaleString() +
                        '</td>\
                                                                            <td>' +
                        item
                        .name +
                        '</td>\
                                                                     <td>' +
                        item.mobile +
                        '</td>\
                                                                     <td>' +
                        item.email1 +
                        '</td>\
                        <td>' +
                        check +
                        '</td>\
                            <td><i class="material-icons"  style="font-size:15px">edit</i>\
                                <i class="material-icons" style="font-size:15px">search</i>\
                                <i class="material-icons" style="font-size:15px">close</i>\
                                <i class="material-icons" style="font-size:15px">devices</i></td>\
                     </tr>'
                    );
                });

                $('#nike2')
                    .empty()
                    .append('<option selected="selected" value="...">الرجاء الاختيار</option>');
                $.each(response.nks, function(key, item) {
                    $('#nike2')
                        .append($("<option name='nk2' id='nk2'></option>")
                            .attr("id", item.id)
                            .text(item.name));

                });
                $('#category')
                    .empty()
                    .append('<option selected="selected" value="...">الرجاء الاختيار</option>');
                $.each(response.categories, function(key, item) {
                    $('#category')
                        .append($("<option name='category' id='category'></option>")
                            .attr("id", item.id)
                            .text(item.name));
                });
                $("#example").dataTable({
                    language: {
                        url: "/assets/lang/ar.json",
                    },

                });
            }
        });
    }

    function resetFields() {
        $('#AddModal form')[0].reset();
    }

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        fetch();

        $("#AddModal").on("hidden.bs.modal", function() {
            resetFields();
        });

        $('.add').click(function(e) {
            e.preventDefault();
            var invitation_type_email = $('#invitation_type_email').is(':checked');
            var invitation_type_mobile = $('#invitation_type_mobile').is(':checked');
            var ite = invitation_type_email ? 1 : 0;
            var itm = invitation_type_mobile ? 1 : 0;
            var email1= $('.email1').val();
            var os = 1;
            var data = {
                'name': $('.name').val(),
                'email1': email1,
                'email2': $('.email2').val(),
                'organization': $('.organization').val(),
                'mobile': $('.mobile').val(),
                'invitation_status': 1,
                'invitation_type_mobile': itm,
                'invitation_type_email': ite,
                'order_status': os,
                'job': $('.job').val(),
                'is_attended': 1,
                'nick_id': $("#nike2 option:selected").attr("id"),
                'category_id': $("#category option:selected").attr("id"),
            }
            $.ajax({
                type: 'POST',
                url: `/add-invitation`,
                data: data,
                dataType: 'json',
                success: function(response) {
                    alert(response.message);
                    $('#AddModal').modal('hide');
                    fetch();
                    $.ajax({
                        type: 'GET',
                        url: `/send`+ '/' + email1,
                        data: data,
                        dataType: 'json',
                        success: function(response) {},
                        error: function(response) {}
                    })
                },
                error: function(response) {
                    $("#errormsg").show();
                    var errors = response.responseJSON;
                    var errorsHtml = '';
                    $.each(errors.errors, function(key, value) {
                        errorsHtml += value[0] + '<br>';
                    });
                    $('#errormsg').html(errorsHtml);
                }
            });
        });
    });
</script>

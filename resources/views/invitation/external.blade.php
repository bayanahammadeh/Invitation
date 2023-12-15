@include('layouts.header')

<!-- Edit Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateForm" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" class="id form-control">
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
                    <div class="row   mt-3">
                        <div class="col-md-6">
                            <label for="name">الاسم الكامل</label>
                            <input type="text" id="name" name="name" class="name form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="mobile">رقم الجوال</label>
                            <input type="text" id="mobile" name="mobile" class="mobile form-control">
                        </div>
                    </div>
                    <div class="row  mt-3">
                        <div class="col-md-6">
                            <label for="email1">البريد الالكتروني</label>
                            <input type="text" id="email1" name="email1" class="email1 form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="organization">الجهة</label>
                            <input type="text" id="organization" name="organization"
                                class="organization form-control">
                        </div>
                    </div>
                    <div class="row  mt-3">
                        <div class="col-md-6">
                            <label for="job">المنصب</label>
                            <input type="text" id="job" name="job" class="job form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="category">الفئة</label>
                            <select id="category" name="category" class="category form-control"></select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="toggle-email">ارسال بريد أيضا</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="outline-success" data-on="نعم"
                                data-off="لا" data-offstyle="outline-danger" id="invitation_type_email">
                        </div>
                        <div class="col-md-6">
                            <label for="toggle-mobile">هل حضر الحفل</label>
                            <input type="checkbox" data-toggle="toggle" data-onstyle="outline-success" data-on="نعم"
                                data-off="لا" data-offstyle="outline-danger" id="invitation_type_mobile">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="order_status">حالة الطلب</label>
                            <select id="order_status" name="order_status" class="order_status form-control">
                                <option value="1">قيد الدراسة</option>
                                <option value="2">تم التأكيد</option>
                                <option value="3">تم الاعتذار</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="update_status btn btn-primary">ارسال</button>
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
                        <th style="text-align: right;">رقم الجوال</th>
                        <th style="text-align: right;">البريد الالكتروني</th>
                        <th style="text-align: right;">حالة الطلب</th>
                        <th style="text-align: right;">داخلي/خارجي</th>
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
    function fetch_external() {
        var x, created_at;
        $.ajax({
            type: 'GET',
            url: `/fetch-external`,
            dataType: 'json',
            success: function(response) {
                $('tbody').html("");
                $.each(response.invitations, function(key, item) {
                    created_at = new Date(item.created_at);
                    if (item.order_status == "1")
                        check = 'قيد الدراسة';
                    if (item.order_status == "2")
                        check = 'تم التأكيد';
                    if (item.order_status == "3")
                        check = 'تم الاعتذار';
                    if (item.invitation_status == "1")
                        invitation_status = 'داخلي';
                    else
                        invitation_status = 'خارجي';
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
                        <td>' +
                        invitation_status +
                        '</td>\
                            <td><button type="button" value="' + item.id + '" class="edit" id="edit" style="background-color:transparent;border:none;color:black" ><i class="material-icons"  style="font-size:15px">edit</i></button>\
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
                    lengthMenu: [5, 8],
                });
            }
        });
    }

    $(document).ready(function() {
        function resetFields() {
            $('#EditModal form')[0].reset();
        }



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        fetch_external();

        $("#EditModal").on("hidden.bs.modal", function() {
            resetFields();
        });

        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            $('#updateForm')[0].reset();
            var id = $(this).val();
            $('#EditModal').modal('show');
            $.ajax({
                type: "GET",
                url: `/edit-order` + '/' + id,
                success: function(response) {
                    $('#id').val(response.invitation.id);
                    $('.name').val(response.invitation.name);
                    $('.mobile').val(response.invitation.mobile);
                    $('.email1').val(response.invitation.email1);
                    $('.organization').val(response.invitation.organization);
                    $('.job').val(response.invitation.category.name);
                    $(".category").val(response.invitation.category.name);
                    $(".nike2").val(response.invitation.nk.name);
                    $('.order_status').val(response.invitation.order_status);
                }
            });
        });

        $('.update_status').click(function(e) {
            e.preventDefault();
            var id= $('#id').val();
            var data = {
                'name': $('.name').val(),
                'email1': $('.email1').val(),
                'order_status': $('.order_status').val(),
            }
            $.ajax({
                type: 'POST',
                url: `/update-status` + '/' + id,
                data: data,
                dataType: 'json',
                success: function(response) {
                    $('#EditModal').modal('hide');
                    fetch_external();
                },
                error: function(response) {
                }
            })
        });

    });
</script>

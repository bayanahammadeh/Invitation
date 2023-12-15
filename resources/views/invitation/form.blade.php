@include('layouts.header')

<div class="container" style="background-color: #fff">
    <main class="flex-shrink-1">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12" style="float: right;color:blue;font-size:40px;text-align:center">
                    <label>سجل الآن</label>
                </div>
            </div>
            <form id="addForm">
                @csrf
                <div class="row  mb-4">
                    <label for="nike2">اللقب</label>
                    <select id="nike2" name="nike2" class="nike2 form-control">
                        <option selected="selected" value="...">الرجاء الاختيار</option>
                        @foreach ($nks as $n)
                            <option value="{{ $n->id }}">{{ $n->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row  mb-4">
                    <label for="name">الاسم الكامل</label>
                    <input type="text" id="name" name="name" class="name form-control">
                </div>
                <div class="row  mb-4">
                    <label for="mobile">رقم الجوال</label>
                    <input type="text" id="mobile" name="mobile" class="mobile form-control">
                </div>
                <div class="row  mb-4">
                    <label for="email1">البريد الالكتروني</label>
                    <input type="text" id="email1" name="email1" class="email1 form-control">
                </div>
                <div class="row mb-4">
                    <label for="organization">الجهة</label>
                    <input type="text" id="organization" name="organization" class="organization form-control">
                </div>
                <div class="row mb-4">
                    <label for="job">المنصب</label>
                    <input type="text" id="job" name="job" class="job form-control">
                </div>
                <div class="col-md-4 mb-5">
                    <button type="submit" class="add btn btn-primary">ارسال</button>
                </div>
            </form>
        </div>
    </main>
</div>

@include('layouts.footer')

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.add').click(function(e) {
            e.preventDefault();
            var data = {
                'name': $('.name').val(),
                'email1': $('.email1').val(),
                'organization': $('.organization').val(),
                'mobile': $('.mobile').val(),
                'invitation_status': 2,
                'invitation_type_mobile': 3,
                'invitation_type_email': 3,
                'order_status': 3,
                'job': $('.job').val(),
                'is_attended': 1,
                'nick_id': $("#nike2 option:selected").attr("id"),
                'category_id': 1,
                'chair_id': 1,
            }

            $.ajax({
                type: 'POST',
                url: `/add-form`,
                data: data,
                dataType: 'json',
                success: function(response) {
                    alert(response.message);
                    fetch();
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

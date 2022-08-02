$("#postSiswa").submit(function (event) {
  event.preventDefault();
  $("#spinner-div").show();
  var formData = {
    nama: $("#nama").val(),
    alamat: $("#alamat").val()
  };
 
  $.ajax({
    type: "POST",
    url: '/siswa',
    data: formData,
    dataType: "json",
    encode: true,
  }).done(function (data) {
    $("#spinner-div").hide();
    window.location.href = '/siswa';
  });
});

$("#updateSiswa").submit(function (event) {
  event.preventDefault();
  $("#spinner-div").show();
  var formData = {
    nis: $("#nis").val(),
    nama: $("#nama").val(),
    alamat: $("#alamat").val()
  };
 
  $.ajax({
    type: "POST",
    url: '/siswa/update',
    data: formData,
    dataType: "json",
    encode: true,
  }).done(function (data) {
    $("#spinner-div").hide();
    window.location.href = '/siswa';
  });
});

$('#key').on('click', '.KeyDelete[data-remote]', function (event) {
  event.preventDefault();
  var formData = {
    id: $(this).data('remote'),
    method: '_DELETE',
  };
 
  $.ajax({
    type: "DELETE",
    url: '/generate',
    data: formData,
    dataType: "json",
    encode: true,
  }).done(function (data) {
    location.reload();
  });
});
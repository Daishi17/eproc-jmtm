// jquery hide and show

$(document).ready(function () {
	$("#nextstep").on("click", function () {
		$("#step2").show();
		$("#step1").css("display", "none");
	});
});
$(document).ready(function () {
	$("#beforestep").on("click", function () {
		$("#step2").css("display", "none");
		$("#step1").show();
	});
});

$(document).ready(function () {
	$("#nextstep1").on("click", function () {
		$("#step2").show();
		$("#step1").css("display", "none");
		$("#step3").css("display", "none");
		$("#step4").css("display", "none");
		$("#step5").css("display", "none");
		$("#step6").css("display", "none");
	});
});
$(document).ready(function () {
	$("#nextstep2").on("click", function () {
		$("#step3").show();
		$("#step1").css("display", "none");
		$("#step2").css("display", "none");
		$("#step4").css("display", "none");
		$("#step5").css("display", "none");
		$("#step6").css("display", "none");
	});
});
$(document).ready(function () {
	$("#nextstep3").on("click", function () {
		$("#step4").show();
		$("#step1").css("display", "none");
		$("#step2").css("display", "none");
		$("#step3").css("display", "none");
		$("#step5").css("display", "none");
		$("#step6").css("display", "none");
	});
});
$(document).ready(function () {
	$("#nextstep4").on("click", function () {
		$("#step5").show();
		$("#step1").css("display", "none");
		$("#step2").css("display", "none");
		$("#step3").css("display", "none");
		$("#step4").css("display", "none");
		$("#step6").css("display", "none");
	});
});
$(document).ready(function () {
	$("#nextstep5").on("click", function () {
		$("#step6").show();
		$("#step1").css("display", "none");
		$("#step2").css("display", "none");
		$("#step3").css("display", "none");
		$("#step4").css("display", "none");
		$("#step5").css("display", "none");
	});
});

$(document).ready(function () {
	$("#beforestep1").on("click", function () {
		$("#step1").show();
		$("#step2").css("display", "none");
		$("#step3").css("display", "none");
		$("#step4").css("display", "none");
		$("#step5").css("display", "none");
		$("#step6").css("display", "none");
	});
});
$(document).ready(function () {
	$("#beforestep2").on("click", function () {
		$("#step2").show();
		$("#step1").css("display", "none");
		$("#step3").css("display", "none");
		$("#step4").css("display", "none");
		$("#step5").css("display", "none");
		$("#step6").css("display", "none");
	});
});
$(document).ready(function () {
	$("#beforestep3").on("click", function () {
		$("#step3").show();
		$("#step1").css("display", "none");
		$("#step2").css("display", "none");
		$("#step4").css("display", "none");
		$("#step5").css("display", "none");
		$("#step6").css("display", "none");
	});
});
$(document).ready(function () {
	$("#beforestep4").on("click", function () {
		$("#step4").show();
		$("#step1").css("display", "none");
		$("#step2").css("display", "none");
		$("#step3").css("display", "none");
		$("#step5").css("display", "none");
		$("#step6").css("display", "none");
	});
});
$(document).ready(function () {
	$("#beforestep5").on("click", function () {
		$("#step5").show();
		$("#step1").css("display", "none");
		$("#step2").css("display", "none");
		$("#step3").css("display", "none");
		$("#step4").css("display", "none");
		$("#step6").css("display", "none");
	});
});



// $("#news-ticker").webTicker({
// 	height: "15px",
// });

$("#login").click(function () {
	$("#loginloader").load("/spse4dev/publik/selecttype", function () {
		$("#myModal").modal({
			show: true,
		});
	});
});
// Scroll to top
$(window).scroll(function () {
	if ($(window).scrollTop() > 300) {
		$("a.back-to-top").fadeIn("slow");
	} else {
		$("a.back-to-top").fadeOut("slow");
	}
});
// $(".datetimepicker").datetimepicker({
// 	format: "d-m-Y H:i",
// 	lang: "id",
// });
// $(".datepicker").datetimepicker({
// 	format: "d-m-Y",
// 	lang: "id",
// });

// alert

function aksiku() {
	document.getElementById("demo").innerHTML =
		'<div class="alert alert-success" role="alert">Data Paket Telah Tersimpan !!</div>';
	setTimeout(() => {
		$("#demo").hide();
	}, 5000);
}
function aksikuu() {
	document.getElementById("demo3").innerHTML =
		'<div class="alert alert-success" role="alert">Rincian Hps Telah Tersimpan !!</div>';
	setTimeout(() => {
		$("#demo3").hide();
	}, 5000);
}

// table dayttable

// add lokasi buat paket
$(document).ready(function () {
	// hapus data lokas
	$(document).on("click", ".removeBtn", function () {
		var obj = $(this);
		var value = obj.attr("value");
		if (value > 0) {
			var action = {
				url: function (args) {
					var pattern = "/spse4dev/paket/hapus_lokasi/:id?lokasiId=:lokasiId";
					for (var key in args) {
						pattern = pattern.replace(":" + key, args[key] || "");
					}
					return pattern;
				},
				method: "GET",
			};
			$.get(
				action.url({
					id: 9076999,
					lokasiId: value,
				}),
				function () {
					// console.log("lokasi berhasil di hapus")
					obj.parent().parent().remove();
				}
			);
		} else {
			obj.parent().parent().remove();
		}
	});

	// tambah data javascript
	$("#tambahlokasi").click(function () {
		var options = $('#tblLokasi tr select[name="propinsiid"]').html();
		var ind = $("#tblLokasi tr").length - 1;
		// var prop_id = $.cookie("paket_edit_propinsi_id");
		var addLokasi = "<tr>";
		addLokasi +=
			'<td><select class="selectpicker form-control " data-placeholder="pilih Provinsi"  data-live-search="true" data-width="auto">' +
			options +
			"</select></td>";
		addLokasi +=
			'<td><select class="selectpicker form-control" data-placeholder="pilih kabupaten" data-live-search="true" data-width="auto">' +
			ind +
			"</select></td>";
		addLokasi +=
			'<td><input type="text" class="selectpicker form-control" name="lokasi[' +
			ind +
			'].pkt_lokasi" placeholder="Alamat Detail"></td>';
		addLokasi +=
			'<td><a href="javascript:void(0)" class="removeBtn"><span class="glyphicon glyphicon-trash"></span></a></td>';
		addLokasi += "</tr>";
		$("#tblLokasi").append(addLokasi);
	});
});

// link active navbar
$(document).on("click", "ul li", function () {
	$(this).addClass("active").siblings().removeClass("active");
});

function tandaPemisahTitik(b) {
	var _minus = false;
	if (b < 0) _minus = true;
	b = b.toString();
	b = b.replace(".", "");
	b = b.replace("-", "");
	c = "";
	panjang = b.length;
	j = 0;
	for (i = panjang; i > 0; i--) {
		j = j + 1;
		if (((j % 3) == 1) && (j != 1)) {
			c = b.substr(i - 1, 1) + "." + c;
		} else {
			c = b.substr(i - 1, 1) + c;
		}
	}
	if (_minus) c = "-" + c;
	return c;
}

function numbersonly(ini, e) {
	if (e.keyCode >= 49) {
		if (e.keyCode <= 57) {
			a = ini.value.toString().replace(".", "");
			b = a.replace(/[^\d]/g, "");
			b = (b == "0") ? String.fromCharCode(e.keyCode) : b + String.fromCharCode(e.keyCode);
			ini.value = tandaPemisahTitik(b);
			return false;
		}
		else if (e.keyCode <= 105) {
			if (e.keyCode >= 96) {
				//e.keycode = e.keycode - 47;
				a = ini.value.toString().replace(".", "");
				b = a.replace(/[^\d]/g, "");
				b = (b == "0") ? String.fromCharCode(e.keyCode - 48) : b + String.fromCharCode(e.keyCode - 48);
				ini.value = tandaPemisahTitik(b);
				//alert(e.keycode);
				return false;
			}
			else { return false; }
		}
		else {
			return false;
		}
	} else if (e.keyCode == 48) {
		a = ini.value.replace(".", "") + String.fromCharCode(e.keyCode);
		b = a.replace(/[^\d]/g, "");
		if (parseFloat(b) != 0) {
			ini.value = tandaPemisahTitik(b);
			return false;
		} else {
			return false;
		}
	} else if (e.keyCode == 95) {
		a = ini.value.replace(".", "") + String.fromCharCode(e.keyCode - 48);
		b = a.replace(/[^\d]/g, "");
		if (parseFloat(b) != 0) {
			ini.value = tandaPemisahTitik(b);
			return false;
		} else {
			return false;
		}
	} else if (e.keyCode == 8 || e.keycode == 46) {
		a = ini.value.replace(".", "");
		b = a.replace(/[^\d]/g, "");
		b = b.substr(0, b.length - 1);
		if (tandaPemisahTitik(b) != "") {
			ini.value = tandaPemisahTitik(b);
		} else {
			ini.value = "";
		}

		return false;
	} else if (e.keyCode == 9) {
		return true;
	} else if (e.keyCode == 17) {
		return true;
	} else {
		//alert (e.keyCode);
		return false;
	}

}

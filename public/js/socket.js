var socket = io('http://localhost:6001')

$(".messages").animate({ scrollTop: $('.messages')[0].scrollHeight }, "fast")

// Nhận dữ liệu từ server
socket.on('chat:message', function (data) {
	// console.log(data)
	// console.log($('p:last-child').attr('id'))
	if ($('#' + data.id).length == 0) {
		$('#messages').append('<p id="'+ data.id +'"><strong>' + data.author + '</strong>: ' + data.content + '</p>')
		$(".messages").animate({ scrollTop: $('.messages')[0].scrollHeight }, "fast")
	}
})

// Cho phép load ajax token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

// Sử dụng ajax lấy thông tin tin nhắn
$(document).ready(function () {
	$(".messages").animate({ scrollTop: $('.messages')[0].scrollHeight }, "fast")


	// Nếu có bấm enter
	$(window).on('keydown', function(e) {
	  if (e.which == 13) {
		content = $('#content').val()
		author = $('#author').val()
		$('#content').val("")
		$('#author').val("")

		if(content.trim() == '' || author.trim() == '') {
			return false
		}

		$.ajax({
			url: 'get-message',
			type: 'POST',
			data: {
				author: author,
				content: content
			},
			success: function (data) {

			}
		})
	    return false
	  }
	})

	// Bấm vào nút gửi
	$('#submit').click(function () {
		content = $('#content').val()
		author = $('#author').val()
		$('#content').val("")
		$('#author').val("")

		if(content.trim() == '' || author.trim() == '') {
			return false
		}

		$.ajax({
			url: 'get-message',
			type: 'POST',
			data: {
				author: author,
				content: content
			},
			success: function (data) {
				
			}
		})
	})
})
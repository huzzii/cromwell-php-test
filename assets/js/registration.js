document
	.getElementById("registrationForm")
	.addEventListener("submit", async function (e) {
		e.preventDefault();

		const form = e.target;
		const formData = new FormData(form);
		const response = await fetch("../api/user.php", {
			method: "POST",
			body: formData,
		});

		const result = await response.json();
		const message = document.getElementById("message");

		if (result.success) {
			message.innerHTML =
				'<div class="success">' + result.message + "</div>";
			form.reset();
			setTimeout(function () {
				window.location.href = "login.php";
			}, 1500);
		} else {
			let html =
				'<div class="error"><strong>' +
				result.message +
				"</strong><br>";

			if (result.errors) {
				for (const key in result.errors) {
					html += result.errors[key] + "<br>";
				}
			}

			html += "</div>";
			message.innerHTML = html;
		}
	});

document
	.getElementById("loginForm")
	.addEventListener("submit", async function (e) {
		e.preventDefault();

		const form = e.target;
		const formData = new FormData(form);
		const response = await fetch("../api/login.php", {
			method: "POST",
			body: formData,
		});

		const result = await response.json();
		const message = document.getElementById("message");

		if (result.success) {
			sessionStorage.setItem("user", JSON.stringify(result.data));

			message.innerHTML =
				'<div class="success">' + result.message + "</div>";
			setTimeout(function () {
				window.location.href = "edit.php";
			}, 1000);
		} else {
			let html = '<div class="error">' + result.message + "</div>";
			message.innerHTML = html;
		}
	});

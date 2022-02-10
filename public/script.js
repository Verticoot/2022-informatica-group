var app = {
    init: function () {
        // Use origin and pathname to force to use https and avoid mixed content
        let origin = window.location.origin;
        let pathname = window.location.pathname;
        $.getJSON(`${origin}${pathname}?users.json`)
            .done(app.writeUsers)
            .fail(app.onFailUsers);
        $.getJSON(`${origin}${pathname}?events.json`)
            .done(app.writeEvents)
            .fail(app.onFailEvents);
    },
    onFailUsers: function (error) {
        console.log("errore nella lettura del file json");
        console.log(error);
    },
    writeUsers: function (jsonData) {
        console.log(jsonData);
        for (user of jsonData) {
            $("ul").append(`<li>${user.user_id}: <span class="cool">${user.name}</span></li>`);
        }
    },
    onFailEvents: function (error) {
        console.log("errore nella lettura del file json");
        console.log(error);
    },
    writeEvents: function (jsonData) {
        console.log(jsonData);
        for (e of jsonData)
			$("body").append(
				`<div class="event">
					<h1>${e.nome}</h1>
					<div class="details">
						<span>by ${e.organizzatore}</span>
						<span> ${e.costo == 0 ? `free` : `${e.costo}€`}
					</div>
				</div>`
			)
    }
}


$(document).ready(app.init);
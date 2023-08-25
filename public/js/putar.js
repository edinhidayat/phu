function putar() {
    let mp3 = $("#pilihmp3").val();

    $("#pemutar").html("");
    $("#pemutar").html(
        `
        <audio controls mute>
            <source src="` +
            mp3 +
            `" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    `
    );
}

function putar() {
    let mp3 = $("#murottal").val();

    $("#pemutar").html("");
    $("#pemutar").html(
        `
        <audio class="mb-0 pb-0" src="` +
            mp3 +
            `" controls mute></audio>
        `
    );
}

import { EmojiButton } from "@joeattardi/emoji-button";

const picker = new EmojiButton();
const trigger = document.querySelector(".trigger");

if (trigger) {
    picker.on("emoji", (selection) => {
        trigger.innerHTML = selection.emoji;
    });

    trigger.addEventListener("click", () => picker.togglePicker(trigger));
}

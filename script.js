
// ==================================================================================================

function copyToClipboard() {
    const textToCopy = document.getElementById("clanTag").textContent;
    navigator.clipboard.writeText(textToCopy).then(() => {
        const feedback = document.getElementById("copyFeedback");
        feedback.style.display = "block";
        setTimeout(() => {
            feedback.style.display = "none";
        }, 2000);
    }).catch(err => {
        console.error("Failed to copy text: ", err);
    });
}

// ====================================================================================================

function copyToClipboardwp() {
    const textToCopy = document.getElementById("wp").textContent;
    navigator.clipboard.writeText(textToCopy).then(() => {
        const feedback = document.getElementById("copyFeedbackwp");
        feedback.style.display = "block";
        setTimeout(() => {
            feedback.style.display = "none";
        }, 2000);
    }).catch(err => {
        console.error("Failed to copy text: ", err);
    });}

// ====================================================================================================

function copyToClipboardsc() {
        const textToCopy = document.getElementById("sc").textContent;
        navigator.clipboard.writeText(textToCopy).then(() => {
            const feedback = document.getElementById("copyFeedbacksc");
            feedback.style.display = "block";
            setTimeout(() => {
                feedback.style.display = "none";
            }, 2000);
        }).catch(err => {
            console.error("Failed to copy text: ", err);
        });}

// =======================================================================================================
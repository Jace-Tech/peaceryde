const messageScreen = document.querySelector("[data-message]")
const BASE_URL = "https://peacerydeafrica.com/api"


const getUnreadMessage = async (id) => {
    const request = await fetch(`${BASE_URL}/messanger.php?messenger=${id}`)
    const response = await request.json()

    return response
}

const getNotifications = async (id) => {
    const request = await fetch(`${BASE_URL}/notifier.php?notify=${id}`)
    const response = await request.json()

    return response
}

const checkMessage = async () => {
    const ADMIN_ID = document.querySelector("[data-id]").value
    const result = await getUnreadMessage(ADMIN_ID)

    messageScreen.innerHTML = ""

    if(result?.length) {
        const messageNotifier = document.createElement("div")
        messageNotifier.className = "text-xs inline-flex font-medium bg-indigo-400 text-white rounded-full text-center leading-5 ml-2 px-2"
        messageNotifier.textContent = result?.length
        messageScreen.appendChild(messageNotifier)
    }
}

setInterval(() => {
    checkMessage()
}, 5000)
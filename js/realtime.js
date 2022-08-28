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

}
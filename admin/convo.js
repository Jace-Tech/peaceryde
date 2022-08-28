const convoContainer = document.querySelector("#convo-container")


const getConvo = async (user, other) => {
    try {
        const request = await fetch(`${BASE_URL}/messanger.php?convo=${user}&other=${other}`)
        const response = await request.text()
        return response
    } catch (err) {
        console.log(err.message)
        return []
    }
}

const setConvo = async () => {
    const ADMIN_ID = document.querySelector("[data-id]").value
    const OTHER_ID = document.querySelector("[name=OTHER_ID]").value
    const result = await getConvo(ADMIN_ID, OTHER_ID)

    console.log(result)
}

setInterval(() => {
    setConvo()
}, 4000)

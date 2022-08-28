const convoContainer = document.querySelector("#convo-container")


const getConvo = async (user, other) => {
    try {
        const request = await fetch(`${BASE_URL}/messanger.php?convo=${user}&other=${other}`)
        const response = await request.json()
        return response
    } catch (err) {
        console.log(err.message)
        return []
    }
}

const setConvo = async () => {
    const result = await getConvo()

    console.log(result)
}

setInterval(() => {
    setConvo()
}, 4000)

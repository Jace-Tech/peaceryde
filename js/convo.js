
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

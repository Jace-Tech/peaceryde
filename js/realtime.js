const messageNotificon = document.querySelector("[data-message]")

const BASE_URL = "https://peacerydeafrica.com/api"

const getUnreadMessage = async (id) => {
    try {
        const request = await fetch(`${BASE_URL}/messanger.php?messenger=${id}`)
        const response = await request.json()
    
        return response
    } catch (err) {
        console.log(err.message)
        return false
    }
}

const checkMessage = async () => {
    const USER_ID = document.querySelector("[data-id]").value
    const result = await getUnreadMessage(USER_ID)

    messageNotificon.innerHTML = `
        <a href="./inbox" style="color: #080C58;">
            <svg width="22" height="20" style="margin-top: -5px;" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.6618 3.6875C19.1722 3.6875 20.3962 4.91146 20.3962 6.42188V16.5781C20.3962 18.0885 19.1722 19.3125 17.6618 19.3125H3.33887C2.61367 19.3125 1.91817 19.0244 1.40537 18.5116C0.892577 17.9988 0.604492 17.3033 0.604492 16.5781V6.42188C0.604492 4.91146 1.82845 3.6875 3.33887 3.6875H17.6618ZM19.0941 8.55781L10.8139 13.112C10.7287 13.1588 10.6341 13.186 10.537 13.1915C10.4399 13.197 10.3429 13.1807 10.2529 13.1437L10.1868 13.1125L1.90658 8.55729V16.5781C1.90658 16.958 2.05748 17.3223 2.32608 17.5909C2.59469 17.8595 2.959 18.0104 3.33887 18.0104H17.6618C18.0417 18.0104 18.406 17.8595 18.6746 17.5909C18.9432 17.3223 19.0941 16.958 19.0941 16.5781V8.55781ZM17.6618 4.98958H3.33887C2.959 4.98958 2.59469 5.14048 2.32608 5.40909C2.05748 5.6777 1.90658 6.04201 1.90658 6.42188V7.0724L10.5003 11.7984L19.0941 7.07187V6.42188C19.0941 6.04201 18.9432 5.6777 18.6746 5.40909C18.406 5.14048 18.0417 4.98958 17.6618 4.98958Z" fill="#080C58" />
            </svg>
            <span style="margin-top:5px ;">&nbsp;Inbox</span>
        </a>`

    if(result?.length) {
        // Set Notification
        messageNotificon.innerHTML = `
                <a href="./inbox" style="color: #080C58;"><svg width="22" height="20" style="margin-top: -5px;" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.6618 3.6875C19.1722 3.6875 20.3962 4.91146 20.3962 6.42188V16.5781C20.3962 18.0885 19.1722 19.3125 17.6618 19.3125H3.33887C2.61367 19.3125 1.91817 19.0244 1.40537 18.5116C0.892577 17.9988 0.604492 17.3033 0.604492 16.5781V6.42188C0.604492 4.91146 1.82845 3.6875 3.33887 3.6875H17.6618ZM19.0941 8.55781L10.8139 13.112C10.7287 13.1588 10.6341 13.186 10.537 13.1915C10.4399 13.197 10.3429 13.1807 10.2529 13.1437L10.1868 13.1125L1.90658 8.55729V16.5781C1.90658 16.958 2.05748 17.3223 2.32608 17.5909C2.59469 17.8595 2.959 18.0104 3.33887 18.0104H17.6618C18.0417 18.0104 18.406 17.8595 18.6746 17.5909C18.9432 17.3223 19.0941 16.958 19.0941 16.5781V8.55781ZM17.6618 4.98958H3.33887C2.959 4.98958 2.59469 5.14048 2.32608 5.40909C2.05748 5.6777 1.90658 6.04201 1.90658 6.42188V7.0724L10.5003 11.7984L19.0941 7.07187V6.42188C19.0941 6.04201 18.9432 5.6777 18.6746 5.40909C18.406 5.14048 18.0417 4.98958 17.6618 4.98958Z" fill="#080C58" />
                        <circle cx="16" cy="6.09082" r="6" fill="#E80F0F" />
                    </svg>
                    <span style="margin-top:5px ;">&nbsp;Inbox</span>
                </a>`
        // Add notification to sidebar
        const sideBarScreen = document.querySelector("#sideBarNot")
        if(sideBarScreen) {
            sideBarScreen.innerHTML = `
                <span class="ml-2 badge badge-danger">
                   ${result.length}
                </span>
            `
        }
    }
}

setInterval(() => {
    checkMessage()
}, 5000)
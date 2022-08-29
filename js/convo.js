const convoContainer = document.querySelector("[data-msgcontainer]")
const BASE_URL = "https://peacerydeafrica.com/api"


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

const removeHighlight = (id) => {
    const elements = convoContainer.querySelectorAll(`#msg-${id}`) ?? []
    const elementAttach = convoContainer.querySelectorAll(`#attach-${id}`) ?? []
    const allElem = [...elements, ...elementAttach]
    allElem.map((element) => {
        if(element.classList.contains("not-read")) {
            element.classList.remove("not-read")
        }
    })
}

const markAsRead = async (id, user) => {
    try {
        const request = await fetch(`${BASE_URL}/messanger.php?read=${id}&user=${user}`)
        const response = await request.json()
        if("status" in response) {
            return false
        }
        return response
    } catch (err) {
        console.log(err.message)
        return []
    }

}

const getSubName = (name) => {
    console.table({name})
    const nameSplit = name.split(" ")
    if(nameSplit.length > 1) {
        return nameSplit.map(_name => _name.substring(0, 1).toUpperCase()).join(" ")
    }
    return name.substring(0, 1).toUpperCase()
}

const returnDateUnit = (hour) => hour >= 12 ? "PM" : "AM"

const setConvo = async () => {
    const USER_ID = document.querySelector("[data-id]").value
    const OTHER_ID = document.querySelector("[name=OTHER_ID]").value
    const result = await getConvo(USER_ID, OTHER_ID)

    if(result?.length) {
        const days = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]
        result.forEach((message) => {
            console.log(message)
            const mainDate = new Date(Date.parse(message?.date))
            const isUser = USER_ID == message.sender_id
            const messageItem = document.createElement("div")

            if(("" + message.attachment).toUpperCase() !== "NULL") {
                // Attachment
                const attachmentItem = document.createElement("div")
                attachmentItem.id = `attach-${message.id}`
                attachmentItem.className = `${isUser ? "chat-message-right" : "chat-message-left"} d-flex align-items-center p-1 mb-2 bg-colored g-2`
                attachmentItem.style.textDecoration = "underline"
                attachmentItem.style.maxHeight = 50

                const files = JSON.parse(message.attachment)
                let fileHTML = ""
                if(files.length) {
                    files.forEach(file => {
                        fileHTML += `<a download="${file}" href="../attachment/${file}" class="rounded d-flex p-2">
                            <svg class="fill-current text-muted flex-shrink-0 mr-3" style="height: 20px; height: 20px;" viewBox="0 0 12 12">
                                <path d="M15 15V5l-5-5H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h12c.6 0 1-.4 1-1zM3 2h6v4h4v8H3V2z"></path>
                            </svg>
                            <span class="text-secondary">
                                ${file}
                            </span>
                        </a>`
                    })
                    attachmentItem.innerHTML = fileHTML
                    if(!convoContainer.querySelector(`#attach-${message.id}`)) convoContainer.insertBefore(attachmentItem, scrollToView)
                }
            }

            // Message
            messageItem.className = `${isUser ? "chat-message-right" : "chat-message-left"} pb-4`
            messageItem.style.flexDirection = `${ isUser ? "row-reverse" : "row" }`
            messageItem.id = `msg-${message.id}`
            messageItem.innerHTML = `
            ${ isUser ? 
                `
                    ${message?.pic ? `
                        <div>
                            <img src="./pic/<?= $USER_PROFILE_PIC; ?>" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">
                                ${days[mainDate.getDay()]}, ${mainDate.getHours()}:${mainDate.getMinutes()} ${returnDateUnit(mainDate.getHours())}
                            </div>
                        </div>
                    ` : `
                        <div>
                            <div class="avater">
                                ${getSubName(message._sender.firstname + ' ' + message._sender.lastname)}
                            </div>
                            <div class="text-muted small text-nowrap mt-2">
                                ${days[mainDate.getDay()]}, ${mainDate.getHours()}:${mainDate.getMinutes()} ${returnDateUnit(mainDate.getHours())}
                            </div>
                        </div>
                    `}

                    <div class="flex-shrink-1 bg-colored py-2 px-3 mr-3">
                        <div class="font-weight-bold mb-1">You</div>
                        ${message?.message}
                    </div>
                ` : 
                `
                    <div>
                        <img src="./pic/index.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                        ${days[mainDate.getDay()]}, ${mainDate.getHours()}:${mainDate.getMinutes()} ${returnDateUnit(mainDate.getHours())}
                    </div>
                    <div class="flex-shrink-1 bg-colored py-2 px-3 ml-3">
                        <div class="font-weight-bold mb-1">
                            ${message?._admin?.name}
                        </div>
                            ${message?.message}
                    </div>
                ` }`;
                // Check if it's there before
                if(!convoContainer.querySelector(`#msg-${message.id}`)) convoContainer.insertBefore(messageItem, scrollToView)

                // mark as read
                setTimeout( async () => {
                    let {id} = await markAsRead(message.id, USER_ID)
                    removeHighlight(id);
                    console.log("ID => ", id)
                }, 4000)
        })
    }
}

setInterval(() => {
    setConvo()
}, 4000)

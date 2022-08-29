const convoContainer = document.querySelector("#convo-container")
// const scrollToView = document.querySelector("#scrollToView")


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
        console.log(response)
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
    const ADMIN_ID = document.querySelector("[data-id]").value
    const OTHER_ID = document.querySelector("[name=OTHER_ID]").value
    const result = await getConvo(ADMIN_ID, OTHER_ID)

    if(result?.length) {
        const days = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]
        result?.filter((msg) => msg.sender_id != ADMIN_ID).forEach(async (message) => {
            console.log(message)
            const mainDate = new Date(Date.parse(message?.date))
            const isAdmin = ADMIN_ID == message.sender_id
            const messageItem = document.createElement("div")

            if(("" + message.attachment).toUpperCase() !== "NULL") {
                // Attachment
                const attachmentItem = document.createElement("div")
                attachmentItem.id = `attach-${message.id}`
                attachmentItem.className = `flex items-start mb-4 last:mb-0 msg-item not-read`
                attachmentItem.style.flexDirection = `${ isAdmin ? "row-reverse" : "row" }`
                const files = JSON.parse(message.attachment)
                let fileHTML = ""
                if(files.length) {
                    files.forEach(file => {
                        fileHTML += `<div class="flex items-center">
                            <svg class="w-6 h-6 fill-current text-gray-400 flex-shrink-0 mr-3" viewBox="0 0 24 24"><path d="M15 15V5l-5-5H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h12c.6 0 1-.4 1-1zM3 2h6v4h4v8H3V2z"></path></svg>
                            <a download="${file}" href="../attachment/${file}" class="text-sm underline ${ isAdmin ? "text-gray-200" : "text-gray-500" } font-semibold flex-1 ">
                                ${ file }
                            </a>
                        </div>`
                    })
                    attachmentItem.innerHTML = `
                    ${ isAdmin ? 
                        `
                            <div class="flex shadow-sm ml-2 items-center justify-center bg-gray-200 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
                            ${message?._admin?.name && getSubName(message?._admin?.name)}
                            </div>
                        ` 
                        : 
                        `
                            ${message?.pic ? 
                                `
                                <img class="w-8 h-8 rounded-full mr-2" src="${message?.pic}" alt="${message?._sender?.firstname}" width="32" height="32">
                            ` : `
                                <div class="flex shadow-sm mr-2 items-center justify-center bg-gray-200 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
                                    ${ getSubName(message?._sender?.firstname + " " + message?._sender?.lastname) }
                                </div>
                            `}
                        ` }  
                        <div>
                            <div class="text-sm ${isAdmin ? "bg-indigo-500 text-white" : "bg-white text-gray-800" } p-3 rounded-lg border border-transparent shadow-md mb-1" style="border-top-right-radius: 0;">
                                ${fileHTML}
                            </div>
                        </div>
                    `
                    }
                    if(!convoContainer.querySelector(`#attach-${message.id}`)) convoContainer.insertBefore(attachmentItem, scrollToView)
                }

            // Message
            messageItem.className = `flex items-start mb-4 last:mb-0 msg-item not-read`
            messageItem.style.flexDirection = `${ isAdmin ? "row-reverse" : "row" }`
            messageItem.id = `msg-${message.id}`
            messageItem.innerHTML = `
            ${isAdmin ? 
                `
                    <div class="flex shadow-sm ml-2 items-center justify-center bg-gray-200 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
                       ${message?._admin?.name && getSubName(message?._admin?.name)}
                    </div>
                ` 
                : 
                `
                    ${message?.pic ? 
                    `
                        <img class="w-8 h-8 rounded-full mr-2" src="${message?.pic}" alt="${message?._sender?.firstname}" width="32" height="32">
                    ` : `
                        <div class="flex shadow-sm mr-2 items-center justify-center bg-gray-200 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
                            ${ getSubName(message?._sender?.firstname + " " + message?._sender?.lastname) }
                        </div>
                    `}
                ` }
                    <div>
                        <div class="text-sm ${isAdmin ? "bg-indigo-500 text-white" : "bg-white text-gray-800" } p-3 rounded-lg border border-transparent shadow-md mb-1" style="border-top-right-radius: 0;">
                            ${message?.message}
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-xs text-gray-500 font-medium" title="${`${days[mainDate.getDay()]}, ${mainDate.getHours()}:${mainDate.getMinutes()} ${returnDateUnit(mainDate.getHours())}`}">
                                ${`${days[mainDate.getDay()]}, ${mainDate.getHours()}:${mainDate.getMinutes()} ${returnDateUnit(mainDate.getHours())}`}
                            </div>
                        </div>
                    </div>
                `
                // Check if it's there before
                if(!convoContainer.querySelector(`#msg-${message.id}`)) {
                    convoContainer.insertBefore(messageItem, scrollToView)
                
                    // Scroll down again
                    scrollToView.scrollIntoView({ behavior: 'smooth'})
                }

                // mark as read
                let {id} = await markAsRead(message.id, ADMIN_ID)
                removeHighlight(id);
                checkMessage()
        })
    }
}

setInterval(() => {
    setConvo()
    // checkEachUsersUnreadMessages()
}, 4000)

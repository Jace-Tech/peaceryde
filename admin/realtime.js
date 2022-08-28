const messageScreen = document.querySelector("#data-message")

console.log(messageScreen)
const messageNotificon = document.querySelector("#data-message-not")
const messageContainer = document.querySelector("#data-message-container")

const notifyScreen = document.querySelector("#data-notify")
const notifyNotificon = document.querySelector("#data-notify-not")
const notifyContainer = document.querySelector("#data-notify-container")

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

const getNotifications = async (id) => {
    try{
        const request = await fetch(`${BASE_URL}/notifier.php?notify=${id}`)
        const response = await request.json()
        return response
    }
    catch (err) {
        console.log(err.message)
        return false
    }
}

const checkMessage = async () => {
    const ADMIN_ID = document.querySelector("[data-id]").value
    const result = await getUnreadMessage(ADMIN_ID)

    messageScreen.innerHTML = ""
    messageNotificon.innerHTML = `
    <span class="sr-only">Message</span>
    <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
        <path class="fill-current text-gray-500" d="M6.5 0C2.91 0 0 2.462 0 5.5c0 1.075.37 2.074 1 2.922V12l2.699-1.542A7.454 7.454 0 006.5 11c3.59 0 6.5-2.462 6.5-5.5S10.09 0 6.5 0z" />
        <path class="fill-current text-gray-400" d="M16 9.5c0-.987-.429-1.897-1.147-2.639C14.124 10.348 10.66 13 6.5 13c-.103 0-.202-.018-.305-.021C7.231 13.617 8.556 14 10 14c.449 0 .886-.04 1.307-.11L15 16v-4h-.012C15.627 11.285 16 10.425 16 9.5z" />
    </svg>
    `

    // Set message 
    messageContainer.innerHTML = `<li class="px-3 py-2 text-center text-gray-400"> No new messages </li>`

    console.log(result)
    if(result?.length) {
        // Set Notification
        messageNotificon.innerHTML = `
        <span class="sr-only">Message</span>
        <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path class="fill-current text-gray-500" d="M6.5 0C2.91 0 0 2.462 0 5.5c0 1.075.37 2.074 1 2.922V12l2.699-1.542A7.454 7.454 0 006.5 11c3.59 0 6.5-2.462 6.5-5.5S10.09 0 6.5 0z" />
            <path class="fill-current text-gray-400" d="M16 9.5c0-.987-.429-1.897-1.147-2.639C14.124 10.348 10.66 13 6.5 13c-.103 0-.202-.018-.305-.021C7.231 13.617 8.556 14 10 14c.449 0 .886-.04 1.307-.11L15 16v-4h-.012C15.627 11.285 16 10.425 16 9.5z" />
        </svg>
        <div class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></div>
        `

        // Set message 
        // result.forEach((message) => {
        //     const messageInbox = document.createElement("li")
        //     messageInbox.className = "border-b border-gray-200 last:border-0"
        //     messageInbox.innerHTML = `
        //         <a class="block py-2 px-4 hover:bg-gray-50" href="./view_message.php?msg=<?= $msg['message_id']; ?>" @click="open = false" @focus="open = true" @focusout="open = false">
        //             <span class="block text-sm mb-2">📣
        //                 <span class="font-medium text-gray-800">New message from <span class="text-indigo-500"> <?= $users->get_user($msg['sender_id'])['firstname'] . " " . $users->get_user($msg['sender_id'])['lastname']; ?></span> <br></span>
        //                 <?= $text = (strlen($msg['message']) <= 30) ? $msg['message'] : substr($msg['message'], 0, 30) . "...";  ?>
        //             </span>
        //             <span class="block text-xs font-medium text-gray-400">
        //                 <?= date("M d, Y h:i a", strtotime($msg['date'])); ?>
        //             </span>
        //         </a>`
        // })

        // Add notification to sidebar
        const messageNotifier = document.createElement("div")
        messageNotifier.className = "text-xs inline-flex font-medium bg-indigo-400 text-white rounded-full text-center leading-5 ml-2 px-2"
        messageNotifier.textContent = result?.length
        messageScreen.appendChild(messageNotifier)
    }
}

const checkNotifier = async () => {
    const ADMIN_ID = document.querySelector("[data-id]").value
    const result = await getNotifications(ADMIN_ID)

    notifyScreen.innerHTML = ""
    notifyNotificon.innerHTML = `
        <span class="sr-only">Notifications</span>
        <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
            <path class="fill-current text-gray-500" d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
        </svg>
    `
    notifyContainer.innerHTML = `<li class="px-3 py-2 text-center text-gray-400"> No notification available </li>`
    
    if(result?.length) {
        // Set notification
        notifyNotificon.innerHTML = `
            <span class="sr-only">Notifications</span>
            <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-current text-gray-500" d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"></path>
            </svg>
            <div class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></div>
        `
       
        // List notifications
        result.forEach(({id, link, message, date}) => {
            const notifyDate = Date.parse(date)
            console.log({ notifyDate })
            const notificationItem = document.createElement("li")
            notificationItem.className = "border-b border-gray-200 last:border-0"
        //     notificationItem.innerHTML = `<a class="block py-2 px-4 hover:bg-gray-50" href="${link}&_tification_id=${id}" @click="open = false" @focus="open = true" @focusout="open = false">
        //     <span class="block text-sm mb-2">📣
        //         <span class="font-medium text-gray-800">${message}</span>
        //     </span>
        //     <span class="block text-xs font-medium text-gray-400">
                
        //     </span>
        // </a>`
        //     notifyContainer.append()
        })
    }
}

setInterval(() => {
    checkMessage()
    checkNotifier()
}, 5000)
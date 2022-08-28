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
    const ADMIN_ID = document.querySelector("[data-id]").value
    const OTHER_ID = document.querySelector("[name=OTHER_ID]").value
    const result = await getConvo(ADMIN_ID, OTHER_ID)

    convoContainer.innerHTML = ""
    if(result?.length) {
        convoContainer.innerHTML = ""
        result.forEach((message) => {
            const messageItem = document.createElement("div")
            const isAdmin = ADMIN_ID == message.sender_id
            messageItem.className = `flex items-start mb-4 last:mb-0`
            messageItem.style.flexDirection = `${ isAdmin ? "row-reverse" : "row" }`
            messageItem.innerHTML = `${isAdmin ? 
                `<div class="flex shadow-sm ml-2 items-center justify-center bg-gray-200 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
                <?=  getSubName($LOGGED_ADMIN['name']); ?> </div>` 
                : 
                `` }`
            /* 
            <div class="flex items-start mb-4 last:mb-0" style="flex-direction: <?= $style = $sender_id === $LOGGED_ADMIN['admin_id'] ? "row-reverse" : "row"; ?>">
                            <?php if($sender_id === $LOGGED_ADMIN['admin_id']): ?>
                                <div class="flex shadow-sm ml-2 items-center justify-center bg-gray-200 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
                                    <?=  getSubName($LOGGED_ADMIN['name']); ?>
                                </div>
                            <?php else: ?>
                                <?php if($PROFILE_PIC != "" || $PROFILE_PIC != NULL || $PROFILE_PIC): ?>
                                    <img class="w-8 h-8 rounded-full mr-2" src="../Dashboard/pic/<?= $PROFILE_PIC; ?>" alt="<?= getUser($connect, $_GET['msg'])['firstname'] ?>" width="32" height="32">
                                <?php else: ?>
                                    <div class="flex shadow-sm mr-2 items-center justify-center bg-gray-200 rounded-full w-10 h-10 text-sm font-semibold uppercase text-gray-500">
                                        <?= getSubName(getUser($connect, $_GET['msg'])['firstname'] . " " . getUser($connect, $_GET['msg'])['lastname']); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div>
                                <div class="text-sm <?= $theme =  $sender_id === $LOGGED_ADMIN['admin_id'] ? "bg-indigo-500 text-white" : "bg-white text-gray-800" ?> p-3 rounded-lg border border-transparent shadow-md mb-1" style="border-top-right-radius: 0;">
                                    <?= $message ?>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-xs text-gray-500 font-medium" title="<?= date("l j, M Y H:i A", strtotime($date)) ?>">
                                        <?= date("D, H:i A", strtotime($date)); ?>
                                    </div>
                                </div>
                            </div>
                        </div> */
        })
        
    }
}

setInterval(() => {
    setConvo()
}, 4000)

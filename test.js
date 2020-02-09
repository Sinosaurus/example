
const userList = [
  'aaaa',
  'bbbbb',
  'chat毛阿敏',
  'cccc',
  'chat胡歌',
  'ddddd'
]
// 胡歌说过的话
const chatHugeMessage = [
  {
    msg: {
      content: {
        text: '是我说的话，没错1',
      },
      time: new Date(),
      type: 'text'
    },
    type: {}
  },
  {
    msg: {
      content: {
        text: '是我说的话，没错2',
      },
      time: new Date(),
      type: 'text'
    },
    type: {}
  }
]
// 毛阿敏说过的话
const chatMaoaminMessage = [
  {
    msg: {
      content: {
        text: '是我说的话，没错1',
      },
      time: new Date(),
      type: 'text'
    },
    type: {}
  },
  {
    msg: {
      content: {
        text: '是我说的话，没错2',
      },
      time: new Date(),
      type: 'text'
    },
    type: {}
  }
]

const userMapMessage = {
  Huge: {
    name: '胡歌',
    list: chatHugeMessage
  },
  Maoamin: {
    name: '毛阿敏',
    list: chatMaoaminMessage
  }
}
/**
 * @description: 获取用户最后一条信息
 * @param {string} name
 * @return: object 返回最后一条用户信息
 */
function getLastMessage(name) {
  // 获取用户消息数组
  let userMessageList = []
  for (const key in userMapMessage) {
    const val = userMapMessage[key]
    if (val.name === name) {
      userMessageList = val.list
    }
  }
  return userMessageList[userMessageList.length - 1]
}
/**
 * TODO: 1. 获取用户说话的用户列表
 */
const chatUser = userList.filter(item => {
  if (/^chat.*/.test(item)) return item
})
/**
 * TODO: 2. 组装需要的数据结构
 */

const messageList = () => {
  let list = []
  chatUser.forEach((item, index) => {
    const user = item.slice(4)
    // 拿到最后一条信息
    const lastMessage = getLastMessage(user)
    const obj = {
      name: item.slice(4),
      time: lastMessage.msg.time,
      // 此处可能需要判断下
      info: lastMessage.msg.content.text
    }
    list.push(obj)
  })
  return list
}

console.log(messageList())
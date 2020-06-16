const WebSocketServer = require('ws').Server
const fs = require('fs')

function getConnectedEvent(stockSymbols) {
  const event = {
    event: 'connected',
    supportedSymbols: stockSymbols,
    message: 'All stocks data is not real and is generated solely for demo purposes.'
  }
  return JSON.stringify(event)
}


let stocks

try {
  stocks = JSON.parse(fs.readFileSync('stocks.json'))
  console.log('Successfully loaded stocks data.')
} catch {
  throw new Error('Could not load stocks data.')
}

const stockSymbols = stocks.map(stock => stock.symbol)

console.log(`Supported stock symbols: ${stockSymbols}`)

const wss = new WebSocketServer({
  port: 8080
})

wss.on('connection', ws => {
  ws.send(getConnectedEvent(stockSymbols))
  ws.on('message', data => {
    console.log(data, 'data')
  })
})

console.log('WebSocket server is listening on ws://localhost:8080')




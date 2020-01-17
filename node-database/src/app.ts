
import Hapi from 'hapi'
import routes from './routes'
async function StartServer() {
  // create app server
  const app = new Hapi.Server({
    port: config.dev.port,
    host: config.dev.host
  })
  // add route
  app.route(routes)
  // register plugin
  await app.register({
    // logging
    plugin: require('hapi-pino'),
    options: {
      prettyPrint: process.env.NODE_ENV !== 'production'
    }
  })
  await app.start()
  // @ts-ignore
  app.logger().info( `Server runing at: ${app.info.uri}`)
}

StartServer().catch(err => console.log(err))

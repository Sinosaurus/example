"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const hapi_1 = __importDefault(require("hapi"));
const routes_1 = __importDefault(require("./routes"));
function StartServer() {
    return __awaiter(this, void 0, void 0, function* () {
        // create app server
        const app = new hapi_1.default.Server({
            port: config.dev.port,
            host: config.dev.host
        });
        // add route
        app.route(routes_1.default);
        // register plugin
        yield app.register({
            // logging
            plugin: require('hapi-pino'),
            options: {
                prettyPrint: process.env.NODE_ENV !== 'production'
            }
        });
        yield app.start();
        // @ts-ignore
        app.logger().info(`Server runing at: ${app.info.uri}`);
    });
}
StartServer().catch(err => console.log(err));

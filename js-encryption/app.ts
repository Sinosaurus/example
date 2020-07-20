import Koa from "koa";
import KoaRouter from "koa-router";
import KoaCors from "koa-cors";
import KoaBodyparser from "koa-bodyparser";
import nodeRSA from "node-rsa";

const App = new Koa();
const router = new KoaRouter();
const privateKey = `-----BEGIN RSA PRIVATE KEY-----
MIICWwIBAAKBgF/B0oQ6iQaMpJewl+ho/ccl5lc03y7isg6sPxJGVUHTZBwsMzIZ
nPAJfBevOd4D0Y0ijFpF2BVdFBiN+GWgfgUlTXYx1nYnFL4rS6gXQYd2J6/48aRT
GBc9Ku26XTLy3VARF6RyaozQ7yrn/RWjiRqltuugGyOfTa7BYV57na+vAgMBAAEC
gYBY5C6uvUASqmDox/BcuYpMYuxvLA+7EIrGgDOUnWHr13bpiEaGTayYT9W4jtuj
M9xFrjqoWon7WwqauMBMZy5UJF3gVyfAUB8Q9LIzR7OJecBClmFqMcWmFBxe+j3c
DQiusNV+cwa5fStnlOs8pUnG5DSDCvMp3zzTiv7c8+zzQQJBAL4U9XHH2k2ZRwg7
j/KS5T2jHXV9jElrKQSaPczSHjD8mjmGoRYrFXP8fh6QG6rjCU63fIKlEuBYoPet
SMQJ8BECQQCA9uyRqzhzfnCmPk43FYUsJdNuIuMyzdy3lTXYiLCUlLVdSMIV0/pD
RIHH361X4Un2G/mkLALqxnxqDD+3jWO/AkBWl/W4//LTpyBU/810FLeafNTO0YM3
bzogfqPoy1A1wN4BlvOLxdTgIgbSpZP1Jbj3w19VpR4UVkv+iVK8/EoBAkBF02wr
QuWBwwgDOuDmekRsrt5XV5RkQYor7CIHZ5sUF6BLLcXIQ8nQ+hq6uaUFW/nLw0Hb
XekGbQmX8aHeJDPJAkEAi734jXV6BGZgnElRsS2Yx+LmjCsqXGnMsYrxI6qvLUvY
BUbkp1i3Uebe7aF7RTICHHUgLVbs3TyCUtBF5TG9TA==
-----END RSA PRIVATE KEY-----`;

const key = new nodeRSA({ b: 1024 });
// 查看 https://github.com/rzcoder/node-rsa/issues/91
key.setOptions({ encryptionScheme: "pkcs1" });
key.importKey(privateKey);

router
  .get("/", async (ctx) => {
    ctx.body = "hello body";
  })
  .post("/login", async (ctx) => {
    const { password } = ctx.request.body;
    ctx.body = key.decrypt(password, "utf8")
  });

App.use(KoaCors())
  .use(KoaBodyparser())
  .use(router.routes())
  .use(router.allowedMethods());
App.listen(3000);

console.log(`http://localhost:3000`);

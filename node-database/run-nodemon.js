const { spawn } = require('child_process')
const path = require('path')
const command = './.bin/nodemon'

const nodemon = spawn(path.resolve(__dirname, command), ['./dist/app.js'])

nodemon.stdout.on('data', (data) => {
  console.log(`stdout: ${data}`);
});

nodemon.stderr.on('data', (data) => {
  console.error(`stderr: ${data}`);
});

nodemon.on('close', (code) => {
  console.log(`子进程退出，退出码 ${code}`);
});
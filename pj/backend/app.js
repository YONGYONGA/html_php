import Search from './entity/Search.js';
import express from 'express';
import * as dotenv from 'dotenv';
import mongoose from 'mongoose';

import indexRouter from './routes/index.js';
import shopRouter from './routes/shop.js';
import datasRouter from './routes/datas.js';
const app = express();
const port = 3000;
dotenv.config();

// 프론트엔드와 통신하기 위한 CORS 설정
app.use(function (req, res, next) {
  res.setHeader('Access-Control-Allow-Origin', '*');
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
  res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');
  res.setHeader('Access-Control-Allow-Credentials', true);
  next();
});

// 라우터 설정
app.use('/', indexRouter);
app.use('/shop', shopRouter);
app.use('/datas',datasRouter);
// 데이터 베이스 연결
mongoose
  .connect(process.env.MONGO_URI, { useNewUrlParser: true, useUnifiedTopology: true })
  .then(() => console.log('Successfully connected to mongodb'))
  .catch(e => console.error(e));

app.listen(port, () => {
  console.log(`Listen to http://localhost:${port}`)
});

export default app;

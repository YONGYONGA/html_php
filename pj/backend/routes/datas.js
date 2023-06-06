import { Router } from 'express';
import { load } from 'cheerio';
import axios from 'axios';
import Search from '../entity/Search.js';
import mongoose from 'mongoose';

const router = Router();
// 네이버 쇼핑 검색 URL

router.get("/", async (req, res) => {
  // mongoose 를 이용하여 데이터베이스에 저장된 데이터를 찾음
  //const search = await Search.findOne({ product: "수박" }); 
  const search = await Search.find({} ); 
    console.log(search);
    res.json(search);
  
});

export default router;

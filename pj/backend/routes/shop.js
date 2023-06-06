import { Router } from 'express';
import { load } from 'cheerio';
import axios from 'axios';
import Search from '../entity/Search.js';
import mongoose from 'mongoose';

const router = Router();
// 네이버 쇼핑 검색 URL
const naverShoppingUrl = 'https://search.shopping.naver.com/search/all?query='

router.get('/:name', async (req, res) => {
  // 사용자가 입력한 검색어
  const name = req.params.name;

  // mongoose 를 이용하여 데이터베이스에 저장된 데이터를 찾음
  const search = await Search.findOne({ product: name }); 

  // 만약 검색어를 통해 데이터베이스에 저장된 데이터가 없다면
  if (search === null) {
    // 상품 정보를 담기 위한 배열
    let productList = [];
    try {
      // axios 모듈을 이용하여 네이버 쇼핑의 페이지를 정적 html 코드를 불러옴
      axios.get(naverShoppingUrl + name).then(({ data }) => {
        // 인코딩 형식 맞추기
        const content = data.toString('utf-8');
        // cheerio 모듈로 받아온 html 코드를 load
        const $ = load(content);
        // 상품 목록이 모여있는 부분 지정
        const $ulList = $('ul.list_basis').children('div').children('div');
        $ulList.each((index, element) => {
          productList[index] = {
            // 받아온 html 정보에서 상품의 링크를 찾아오는 과정
            link: $(element)
              .children('li.basicList_item__0T9JD')
              .children('div.basicList_inner__xCM3J')
              .children('div.basicList_img_area__AdRY_')
              .children('div.thumbnail_thumb_wrap__RbcYO')
              .children('a.thumbnail_thumb__Bxb6Z').attr('href'),
            // 받아온 html 정보에서 상품의 이름을 찾아오는 과정
            name: $(element)
              .children('li.basicList_item__0T9JD')
              .children('div.basicList_inner__xCM3J')
              .children('div.basicList_info_area__TWvzp')
              .children('div.basicList_title__VfX3c')
              .find('a').attr('title'),
            // 받아온 html 정보에서 상품의 가격을 찾아오는 과정
            price: $(element)
              .children('li.basicList_item__0T9JD')
              .children('div.basicList_inner__xCM3J')
              .children('div.basicList_info_area__TWvzp')
              .children('div.basicList_price_area__K7DDT')
              .children('strong.basicList_price__euNoD')
              .children('span')
              .find('span.price_num__S2p_v').text()
          }
        })
        
        // 상품 리스트를 반환해주는데, "10,000원" 형식으로 반환되는 가격을 100000 으로 변환하고 오름차순으로 정렬한 후 반환
        const newSearch = {
          product: name,
          result: productList.sort((a, b) => {
            return parseInt(a.price.split('원')[0].split(',').join('')) - parseInt(b.price.split('원')[0].split(',').join(''))
          })
        };

        // 데이터베이스에 저장
        new Search(newSearch).save();

        // 상품 리스트 반환
        res.json(newSearch.result); 
      })
    } catch(err) {
      // 에러 핸들러
      console.log(err);
    }
  } else {
    // 만약 검색어를 통해 데이터베이스에 저장된 데이터가 있다면
    // 그 데이터를 반환
    console.log(search.result);
    res.json(search.result);
  };
});

export default router;

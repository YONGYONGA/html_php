import { useState } from "react";
import axios from "axios";
import './index.css'

const Index = () => {
  const [input, setInput] = useState('');
  const [productList, setProductList] = useState([]);
  const [loading, setLoading] = useState(false);
  const [lloading, ssetLoading] = useState(false);
  // 상품 리스트 불러오기
  const getProductList = async () => {
    // 로딩 중으로 변경
    setLoading(true);
    ssetLoading(true);
    // 상품 리스트 불러오기
    const { data } = await axios.get(`http://localhost:3000/shop/${input}`).then((data) => {
      // 로딩 중이 아님으로 변경
      setLoading(false);
      return data;
    })
    // 불러온 상품 리스트를 productList에 저장
    setProductList(data);
  }
  const allProductList = async () => {
    // 로딩 중으로 변경
    setLoading(true);
    ssetLoading(true);
    // 상품 리스트 불러오기
    const { data } = await axios.get(`http://localhost:3000/datas`).then((data) => {
      // 로딩 중이 아님으로 변경
      ssetLoading(false);
      return data;
    })
    // 불러온 상품 리스트를 productList에 저장
    setProductList(data);
  }
  // 엔터키 입력 시 상품 리스트 불러오기
  const handleEnter = (e) => {
    if (e.key === 'Enter')
      getProductList();
  }

  return (
    <div className="container">
      <div className="title">
        <input type="text" value={input} onChange={e => setInput(e.target.value)} onKeyDown={handleEnter} />
        <button onClick={getProductList}>검색</button>
        <button onClick={allProductList}>history</button>
      </div>
      <div className="product_list">
        {/* 로딩 중이 아닐 때 상품 리스트 불러오기 */}
        {/* map 함수를 이용하여 배열의 값을 하나하나 불러와서 상품 리스트 정렬 */}
        { loading ? '': productList.map((contant, i) => {
          return (
            <div className="product">
              <h1>{ contant.name }</h1>
              <div className="product_desc">
                <p>{ contant.price }</p>
                <a href={contant.link}>상품으로 이동</a>
              </div>
            </div>
          )
        }) }
        { lloading ? '': productList.map((contant, i) => {
          return (
            <div className="product">
              <h1>{ contant.product }</h1>
            </div>
          )
        }) }       
      </div>
    </div>
  )
}

export default Index;
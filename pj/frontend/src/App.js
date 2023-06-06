import './App.css';
import { Route, BrowserRouter, Routes } from 'react-router-dom';
import Index from './pages';

function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
          <Route path='/' element={<Index />} ></Route>
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;

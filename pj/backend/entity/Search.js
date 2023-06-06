import mongoose from 'mongoose';

// db 구조
const Search = new mongoose.Schema({
  product: {
    type: String,
    unique: true,
    required: true,
  },
  result: [
    {
      name: {
        type: String,
        required: true,
      },
      price: {
        type: String,
        required: true,
      },
      link: {
        type: String,
        required: true,
      },
    }
  ]
});

export default mongoose.model('Search', Search)
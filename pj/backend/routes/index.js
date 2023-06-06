import { Router } from 'express';
const router = Router();

// 테스트 라우팅
router.get('/', function(req, res) {
  res.json({
    message: 'ok'
  });
});

export default router;

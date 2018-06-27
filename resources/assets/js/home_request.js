/**
 * Created by zxz1992 on 2018/5/22.
 */
import axios from 'axios'
// 创建axios实例
const service = axios.create({
  baseURL: 'http://192.168.0.188:8866/mock/5b19f300152f4405081fd865/map/', // api的base_url
  timeout: 15000 // 请求超时时间
})

// request拦截器
service.interceptors.request.use(config => {
return config
}, error => {
  // Do something with request error
  console.log(error) // for debug
  Promise.reject(error)
})

// respone拦截器
service.interceptors.response.use(
  response => {
  if (response.data.success) { // 请求成功
  return response.data
} else {
  alert(response.data.message);
}
},
error => {
  // 错误处理
  const status = error.response.status // 错误状态码
  switch (status) {
    case 401 : // 登录超时
      // TODO: 要不要跳转到 登录页面？？？ 以及弹窗的提示方式 样式？？
      alert("登录超时,本次登录已超时，您可重新登录或点击取消留在本页面继续浏览！");
      break
    case 403 : // 无权限
      alert("您无权限执行次操作");
      break
    case 415 :
    case 422 : // 常规错误
      alert(error.response.data.message);
      break
    case 404 : // 资源不存在
      alert("请求资源不存在或已被删除");
      break
    case 429 : // 请求次数过多
      alert("操作频率过高，请稍后重试");
      break
    case 500 : // 服务器崩溃
      alert("服务器发生错误，请联系客服处理");
      break
    default: // 未知错误
      alert('产生未知错误，错误状态码：' + status);
      break
  }
  return Promise.reject(error)
}
)

export default service

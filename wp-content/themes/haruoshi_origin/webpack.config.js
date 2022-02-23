const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const path = require('path');

module.exports = {
  mode:'development',
  entry:'./src/scss/style.scss',
  //ソース元のjs
  output: {
    path: path.resolve(__dirname, 'dist')
  },
  //出力先のフォルダ
  module: {
    rules: [
       {
        test:/\.scss$/,
        use: [
          {
            loader: MiniCssExtractPlugin.loader
            //cssファイルを出力できるやつ
          },
          {
            loader: 'css-loader',
            options: {
              url: false,
            }
            //cssをjsに読み込ませられるやつ
          },        
          {
            loader: 'sass-loader',
            //sass読み込み
          },
        ]
      }
    ]
  },
  plugins: [new MiniCssExtractPlugin({
    filename:'style.css'
    //出力するcssのファイル名
  })]
};
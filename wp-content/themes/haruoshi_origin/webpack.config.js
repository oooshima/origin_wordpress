const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');
const path = require('path');

module.exports = {
  mode:'development',
  entry: {
    common: './src/scss/common.scss',
    header: './src/scss/header.scss',
    footer: './src/scss/footer.scss',
    home: './src/scss/home.scss'
  },
  //ソース元のjs
  output: {
    path: path.resolve(__dirname, 'dist/css')
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
  plugins: [
    new RemoveEmptyScriptsPlugin(),
    new MiniCssExtractPlugin({
    filename:'[name].css',
    //出力するcssのファイル名
  })]
};
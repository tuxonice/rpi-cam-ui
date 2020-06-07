const path = require('path');

module.exports = {
  entry: './assets/js/index.js',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'public/dist'),
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          'style-loader',
          'css-loader',
        ],
      },
      {
        test: /\.(png|svg|jpg|gif)$/,
          use: [
            'file-loader',
          ],
      },
    ],
  },
};


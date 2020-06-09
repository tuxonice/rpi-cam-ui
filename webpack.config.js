const path = require("path");
const CopyPlugin = require("copy-webpack-plugin");

module.exports = {
  entry: "./assets/js/index.js",
  output: {
    filename: "bundle.js",
    path: path.resolve(__dirname, "public/dist")
  },
  plugins: [
    new CopyPlugin({
      patterns: [
        { from: "assets/images", to: path.resolve(__dirname, "public/dist") }
      ]
    })
  ],
  module: {
    rules: [
      {
        test: /\.css$/,

        use: ["style-loader", "css-loader"]
      },
      {
        test: /\.(png|svg|jpg|gif)$/,
        use: ["file-loader"]
      }
    ]
  }
};

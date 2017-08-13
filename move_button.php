<style>
.move_button {
  border-radius: 10px;
  background-color: #3399ff;
  border: none;
  color: #FFFFFF;//文字顏色
  text-align: center;
  font-size: 28px;
  padding: 5px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.move_button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.move_button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.move_button:hover span {
  padding-right: 25px;
}

.move_button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
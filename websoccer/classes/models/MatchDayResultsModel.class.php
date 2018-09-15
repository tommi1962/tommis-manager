<?php
/******************************************************

  This file is part of OpenWebSoccer-Sim.

  OpenWebSoccer-Sim is free software: you can redistribute it 
  and/or modify it under the terms of the 
  GNU Lesser General Public License 
  as published by the Free Software Foundation, either version 3 of
  the License, or any later version.

  OpenWebSoccer-Sim is distributed in the hope that it will be
  useful, but WITHOUT ANY WARRANTY; without even the implied
  warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
  See the GNU Lesser General Public License for more details.

  You should have received a copy of the GNU Lesser General Public 
  License along with OpenWebSoccer-Sim.  
  If not, see <http://www.gnu.org/licenses/>.

******************************************************/

/**
 * @author Ingo Hofmann
 */
class MatchDayResultsModel implements IModel {
	private $_db;
	private $_i18n;
	private $_websoccer;
	private $_seasonId;
	private $_matchday;
	
	public function __construct($db, $i18n, $websoccer) {
		$this->_db = $db;
		$this->_i18n = $i18n;
		$this->_websoccer = $websoccer;
	}
	
	public function renderView() {
		$this->_seasonId = (int) $this->_websoccer->getRequestParameter("seasonid");
		$this->_matchday = (int) $this->_websoccer->getRequestParameter("matchday");
		return ($this->_seasonId > 0 && $this->_matchday > 0);
	}
	
	public function getTemplateParameters() {
		
		$matches = MatchesDataService::getMatchesByMatchday($this->_websoccer, $this->_db, $this->_seasonId, $this->_matchday);
		
		return array("matches" => $matches);
	}
	
	
}

?>
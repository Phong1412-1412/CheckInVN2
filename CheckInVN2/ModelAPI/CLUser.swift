//
//  CLUser.swift
//  CheckInVN2
//
//  Created by PPPP on 17/01/2023.
//

import Foundation

struct User: Hashable, Codable {
    let userID: Int
    let userName: String
    let userEmail: String
    let userPassWord: Int
}
